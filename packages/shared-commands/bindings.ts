import { invoke } from '@tauri-apps/api'

export function callApi(route: string, params: { [key: string]: string }) {
	return invoke('plugin:shared_commands|call_api', { route, params })
}
