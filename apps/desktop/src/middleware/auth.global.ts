export default defineNuxtRouteMiddleware((to, from) => {
	if (to.path === '/auth/login' || to.path === '/redirect' || localStorage.loggedIn) return;

	if (!localStorage.loggedIn) return navigateTo('/auth/login');

	return;
})
