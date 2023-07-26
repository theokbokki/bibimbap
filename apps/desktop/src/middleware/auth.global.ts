export default defineNuxtRouteMiddleware((to, from) => {
	if (to.path === '/auth/login') return;

	if (!localStorage.loggedIn) return navigateTo('/auth/login');

	return;
})
