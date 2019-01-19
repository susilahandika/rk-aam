function base_url() {
	return window.location.origin + '/' + window.location.pathname.split('/')[1] + '/';
}