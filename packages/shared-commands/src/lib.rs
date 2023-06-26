use reqwest::Client;
use std::collections::HashMap;
use tauri::{
    plugin::{Builder, TauriPlugin},
    Runtime,
};

#[tauri::command]
async fn call_api(route: String, params: HashMap<String, String>) -> String {
    call_api_inner(route, params).await
}

async fn call_api_inner(route: String, params: HashMap<String, String>) -> String {
    let client = Client::new();

    let mut request = client.post(&format!("http://web.test/{}", route));

    let form_data: Vec<(&str, &str)> = params
        .iter()
        .map(|(k, v)| (k.as_str(), v.as_str()))
        .collect();

    request = request.form(&form_data);

    let response = request
        .header("Accept", "application/json")
        .header("Authorization", "Bearer test")
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
