// Prevents additional console window on Windows in release, DO NOT REMOVE!!
#![cfg_attr(not(debug_assertions), windows_subsystem = "windows")]

use tauri::Manager;

fn main() {
    tauri_plugin_deep_link::prepare("desktop.bibimbab.dev");

    #[cfg(debug_assertions)]
    tauri::Builder::default()
        .setup(|app| {
            let handle = app.handle();
            tauri_plugin_deep_link::register("bibimbap", move |request| {
                dbg!(&request);
                handle.emit_all("scheme-request-received", request).unwrap();
            })
            .unwrap();

            Ok(())
        })
        .plugin(shared_commands::init())
        .run(tauri::generate_context!())
        .expect("error while running tauri application");
}
