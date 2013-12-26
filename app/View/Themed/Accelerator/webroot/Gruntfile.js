module.exports = function(grunt) {

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        concat: {
            // 2. Configuration for concatinating files goes here.
            dist: {
                src: [
                  'js/vendor/jquery-1.10.2.min.js', 
                  'js/plugins.js', 
                  'js/main.js'
                ],
                dest: 'js/build/production.js',
            },
        },
        uglify: {
            build: {
                src: 'js/build/production.js',
                dest: 'js/build/production.min.js'
            }
        },
        imagemin: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: 'img/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'img/build/'
                }]
            }
        },
        watch: {
            scripts: {
                files: ['js/*.js'],
                tasks: ['concat', 'uglify'],
                options: {
                    spawn: false,
                },
            } 
        }

    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-contrib-concat');

    // Minify Javascript
    grunt.loadNpmTasks('grunt-contrib-uglify');

    // Minify/optimize images
    grunt.loadNpmTasks('grunt-contrib-imagemin');

    // Watch files for changes
    grunt.loadNpmTasks('grunt-contrib-watch');

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['concat', 'uglify', 'imagemin', 'watch']);

};

      