module.exports = {
	dist: {
		options: {
			processors: [
				require('autoprefixer')({browsers: 'last 2 versions'})
			]
		},
		files: {
			'assets/css/cgu-brand.css': [ 'assets/css/cgu-brand.css' ]
		}
	}
};
