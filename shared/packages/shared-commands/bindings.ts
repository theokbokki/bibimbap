import { invoke } from '@tauri-apps/api'

export function callApi(httpVerb: string, route: string, params: { [key: string]: string }) {
	return invoke('plugin:shared_commands|call_api', { httpVerb, route, params })
}
