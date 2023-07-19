use jsonwebtoken::{encode, EncodingKey, Header};
use reqwest::Client;
use serde::{Deserialize, Serialize};
use std::collections::HashMap;
use std::time::{SystemTime, UNIX_EPOCH};
use tauri::{
    plugin::{Builder, TauriPlugin},
    Runtime,
};

lazy_static::lazy_static! {
    static ref JWT: String = generate_jwt();
}

#[derive(Debug, Serialize, Deserialize)]
struct Claims {
    exp: usize, // Required. Expiration time (as UTC timestamp)
}

fn generate_jwt() -> String {
    // Set the expiration time for the token (e.g., 1 hour from now)
    let expiration_time = SystemTime::now()
        .duration_since(UNIX_EPOCH)
        .expect("Failed to obtain current timestamp")
        .as_secs()
        + 3600; // Add 1 hour (3600 seconds)

    // Create the claims struct
    let claims = Claims {
        exp: expiration_time as usize,
    };

    // Set the dummy secret key
    let secret_key = "your_dummy_secret_key".as_bytes();

    // Generate the JWT
    let token = encode(
        &Header::default(),
        &claims,
        &EncodingKey::from_secret(secret_key),
    )
    .expect("Failed to generate JWT");

    token
}

#[tauri::command]
async fn call_api(http_verb: String, route: String, params: HashMap<String, String>) -> String {
    call_api_inner(http_verb, route, params).await
}

async fn call_api_inner(
    http_verb: String,
    route: String,
    params: HashMap<String, String>,
) -> String {
    let client = Client::new();

    let mut request = match http_verb.as_str() {
        "GET" => client.get(&format!("http://web.test/api/{}", route)),
        "POST" => client.post(&format!("http://web.test/api/{}", route)),
        "PUT" => client.put(&format!("http://web.test/api/{}", route)),
        "DELETE" => client.delete(&format!("http://web.test/api/{}", route)),
        "PATCH" => client.patch(&format!("http://web.test/api/{}", route)),
        _ => panic!("Invalid HTTP verb"),
    };

    let form_data: Vec<(&str, &str)> = params
        .iter()
        .map(|(k, v)| (k.as_str(), v.as_str()))
        .collect();

    request = request.form(&form_data);

    let response = request
        .header("Accept", "application/json")
        .header("Authorization", format!("Bearer {}", JWT.clone()))
        .send()
        .await
        .unwrap();

    response.text().await.unwrap()
}

/// Initializes the plugin.
pub fn init<R: Runtime>() -> TauriPlugin<R> {
    Builder::new("shared_commands")
        .invoke_handler(tauri::generate_handler![call_api])
        .build()
}
