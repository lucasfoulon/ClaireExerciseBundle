var mainApp = angular.module('mainApp',
    [
        'ngRoute',
        'ngResource',
        'ngSanitize',
        'ui.bootstrap',
        'ui.router',
        'ngDragDrop',
        'textAngular',
        'angular-loading-bar',
        'mainAppControllers',
        'userServices',
        'resourceControllers',
        'resourceServices',
        'modelControllers',
        'modelServices',
        'exerciseServices',
        'exerciseByModelServices',
        'itemByExerciseServices', /* Bryan : Changed that */
        'attemptByExerciseServices',
        'answerServices',
        'attemptServices',
        'attemptListServices',
        'itemServices',
        'uploadServices',
        'itemControllers',
        'attemptControllers',
        'learnerControllers',
        'angularFileUpload'
    ]
);
