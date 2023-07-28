// Prevents additional console window on Windows in release, DO NOT REMOVE!!
#![cfg_attr(not(debug_assertions), windows_subsystem = "windows")]

use shared_commands::check_jwt;
use tauri::Manager;

fn main() {
    tauri_plugin_deep_link::prepare("desktop.bibimbab.dev");

    #[cfg(debug_assertions)]
    tauri::Builder::default()
        .setup(|app| {
            let handle = app.handle();
            tauri_plugin_deep_link::register("bibimbap", move |request| {
                dbg!(&request);

                let token = request.split('?').nth(1).and_then(|query| {
                    query
                        .split('&')
                        .find(|param| param.starts_with("token="))
                        .map(|param| param.trim_start_matches("token="))
                });

                if let Some(token) = token {
                    // Extract the path from the URL if the token is present
                    let path = request.split("://").nth(1).unwrap_or_default();

                    // Call the check_jwt function and debug its result
                    dbg!(check_jwt(token.to_string()));
                }

                handle.emit_all("scheme-request-received", request).unwrap();
            })
            .unwrap();

            Ok(())
        })
        .plugin(shared_commands::init())
        .run(tauri::generate_context!())
        .expect("error while running tauri application");
}
