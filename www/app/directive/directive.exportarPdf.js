angular.module('IMPERIUM').directive('exportToPdf', function () {

   return {
       restrict: 'E',
       scope: {
            elemId: '@'
       },
       template: '<button data-ng-click="exportToPdf()">Export to PDF</button>',
       link: function(scope, elem, attr){

          scope.exportToPdf = function() {

              var doc = new jsPDF();

              console.log('elemId 12312321', scope.elemId);

              doc.fromHTML(
              document.getElementById(scope.elemId).innerHTML, 15, 15, {
                     'width': 170
              });

              doc.save('a4.pdf')

           }
       }                   
   }

});  