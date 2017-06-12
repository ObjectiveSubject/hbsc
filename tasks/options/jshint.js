module.exports = {
	all: [
		'Gruntfile.js',
		'assets/js/src/**/*.js'
	],
	options: {
		curly: true,
		eqeqeq: false,
		eqnull: true,
		browser: true,
		asi: true,
		globals: {
			jQuery: true
		},
	}
};
