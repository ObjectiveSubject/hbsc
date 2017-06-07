module.exports = {
	main: {
		options: {
			mode: 'zip',
			archive: './release/hbsc.<%= pkg.version %>.zip'
		},
		expand: true,
		cwd: 'release/<%= pkg.version %>/',
		src: ['**/*'],
		dest: 'hbsc/'
	}
};