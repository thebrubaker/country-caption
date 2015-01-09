/*!
 * CountryCaptionChallenge Gruntfile
 * @author Joel Brubaker
 */
 
'use strict';
 
/**
 * Grunt Module
 */
module.exports = function(grunt) {
	/**
	 * Configuration
	 */
	grunt.initConfig({
	 	/**
	 	 * Get package meta data
	 	 */
	 	pkg: grunt.file.readJSON('package.json'),

	 	// /**
	 	//  * Set project object
	 	//  */
	 	// project: {
	 	//   app: 'app',
	 	//   assets: '<%= project.app %>/assets',
	 	//   src: '<%= project.assets %>/src',
	 	//   css: [
	 	//     '<%= project.src %>/scss/style.scss'
	 	//   ],
	 	//   js: [
	 	//     '<%= project.src %>/js/*.js'
	 	//   ]
	 	// },

	 	// /**
	 	//  * Project banner
	 	//  */
	 	// tag: {
	 	//   banner: '/*!\n' +
	 	//           ' * <%= pkg.name %>\n' +
	 	//           ' * @author <%= pkg.author %>\n' +
	 	//           ' * @version <%= pkg.version %>\n' +
	 	//           ' */\n'
	 	// },

	 	// /**
	 	//  * Sass
	 	//  */
	 	// sass: {
	 	//   dev: {
	 	//     options: {
	 	//       style: 'expanded',
	 	//       banner: '<%= tag.banner %>',
	 	//       compass: true
	 	//     },
	 	//     files: {
	 	//       '<%= project.assets %>/css/style.css': '<%= project.css %>'
	 	//     }
	 	//   },
	 	//   dist: {
	 	//     options: {
	 	//       style: 'compressed',
	 	//       compass: true
	 	//     },
	 	//     files: {
	 	//       '<%= project.assets %>/css/style.css': '<%= project.css %>'
	 	//     }
	 	//   }
	 	// },

	 	/**
	 	 * Sass
	 	 */
	 	sass: {
	 	  dist: {
	 	    files: {
	 	      'public/css/style.css': 'app/assets/src/scss/style.scss'
	 	    }
	 	  }
	 	},

	 	/**
	 	 * Watch
	 	 */
	 	watch: {
	 	  css: {
	 	    files: 'app/assets/src/scss/{,*/}*.{scss,sass}',
	 	    tasks: ['sass']
	 	  }
	 	}
	});

	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('default',['watch']);

};