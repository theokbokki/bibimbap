// Prevents additional console window on Windows in release, DO NOT REMOVE!!
#![cfg_attr(not(debug_assertions), windows_subsystem = "windows")]

use reqwest::Client;
use specta::collect_types;
use std::collections::HashMap;
use tauri_specta::ts;

#[tauri::command]
#[specta::specta]
async fn call_api(route: String, params: HashMap<String, String>) -> String {
    let client = Client::new();

    let mut request = client.post(&format!("http://127.0.0.1:8000/api/{}", route));

    for (key, value) in params {
        request = request.form(&[(key, value)]);
    }

    let response = request
        .header("Accept", "application/json")
        .header("Authorization", "Bearer test")
        .send()
        .await
        .unwrap();

    response.text().await.unwrap()
}

fn main() {
    #[cfg(debug_assertions)]
    ts::export(collect_types![call_api], "../src/lib/bindings.ts").unwrap();
    tauri::Builder::default()
        .invoke_handler(tauri::generate_handler![call_api])
        .run(tauri::generate_context!())
        .expect("error while running tauri application");
}
