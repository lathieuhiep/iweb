'use strict';
module.exports = grunt => {
	grunt.initConfig({

		sass: {

            options: {
                outputStyle: 'expanded',
                sourceMap: true
            },

			compile: {
				files: {
					'iweb/style.css': 'scss/style.scss',
				}
			},
		},

	});

	grunt.loadTasks('tasks');
	grunt.registerTask('default', ['sass']);
};
