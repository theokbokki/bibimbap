// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
	devtools: { enabled: true },
	ssr: false,
	srcDir: 'src',
	modules: ['@bibimbap/ui'],
	css: ['@bibimbap/ui/lib/styles/ui.scss'],
})
