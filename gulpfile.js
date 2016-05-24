var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync');




gulp.task('watch', ['browserSync', 'sass'], function(){
	gulp.watch('app/sass/*.sass', ['sass']);
	gulp.watch('app/*.html', browserSync.reload);
	gulp.watch('app/dist/font/*', browserSync.reload);
	gulp.watch('app/dist/js/*.js', browserSync.reload);
});

gulp.task('sass', function(){
	return gulp.src('app/sass/*.sass')
	.pipe(sass())
	.pipe(gulp.dest('app/dist/css'))
	.pipe(browserSync.reload({
		stream:true
	}))
});

gulp.task('browserSync', function(){
	browserSync({
		server: {
			baseDir: 'app/'
		},
	})
});