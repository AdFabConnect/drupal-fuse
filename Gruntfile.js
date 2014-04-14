module.exports = function(grunt) {
    'use strict';

    var localConfig = grunt.file.readJSON('package.json').localConfig;

    require('matchdep').filterDev('grunt-!(cli)').forEach(grunt.loadNpmTasks);

    grunt.initConfig({
        less: {
            dev: {
                options: {
                    sourceMap: true,
                    sourceMapFilename: 'app/site/themes/themefuse/css/style.css.map',
                    sourceMapRootpath: localConfig.host + localConfig.pathname
                },
                files: {
                    'app/site/themes/themefuse/css/bootstrap.css': 'app/bootstrap-styleguide/less_bootstrap/bootstrap.less',
                    'app/site/themes/themefuse/css/style.css': 'app/bootstrap-styleguide/less/style.less'
                }
            }
        },
        styleguide: {
            options: {
                template: {
                    src: 'app/boostrap-styleguide/styleguide/kss'
                },
                framework: {
                    name: 'kss'
                }
            },
            all: {
                options: {
                    // task options
                },
                files: {
                    'app/bootstrap-styleguide/styleguide/bootstrap': 'app/bootstrap-styleguide/less_bootstrap/*.less',
                    'app/bootstrap-styleguide/styleguide/components': 'app/bootstrap-styleguide/less/*.less'
                }
            }
        },
        stylestats: {
            your_target: {
            	src: ['css/*.css']
            }
        },
        watch: {
            all: {
                files: [
                        'app/bootstrap-styleguide/less/**/*.less',
                        'app/bootstrap-styleguide/less_bootstrap/**/*.less'
                       ],
                tasks: ['less', 'styleguide'],
            }
        }
    });

    grunt.registerTask('default', ['less', 'styleguide', 'watch']);
};
