module.exports = {
	main: {
		options: {
			mode: 'zip',
			archive: './release/cgu.<%= pkg.version %>.zip'
		},
		expand: true,
		cwd: 'release/<%= pkg.version %>/',
		src: ['**/*'],
		dest: 'cgu/'
	}
};