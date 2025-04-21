
(function () {
	"use strict";

	var treeviewMenu = $('.app-menu');

	// Toggle Sidebar
	$('[data-toggle="sidebar"]').click(function(event) {
		event.preventDefault();
		$('.app').toggleClass('sidenav-toggled');
	});

	// Activate sidebar treeview toggle
	$("[data-toggle='treeview']").click(function(event) {
		event.preventDefault();
		if(!$(this).parent().hasClass('is-expanded')) {
			treeviewMenu.find("[data-toggle='treeview']").parent().removeClass('is-expanded');
		}
		$(this).parent().toggleClass('is-expanded');
	});



// تأكد من أن DataTables يتم تحميلها فقط عندما تحتوي الصفحة على جدول
// تحميل المكتبات الخاصة بـ DataTables فقط إذا كانت الصفحة تحتوي على جدول
if (document.querySelector('#sampleTable')) {
    import('https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js').then(() => {
        $(document).ready(function() {
            $('#sampleTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
				"language": {
                "sEmptyTable": "لا توجد بيانات في الجدول",
                "sInfo": "إظهار _START_ إلى _END_ من _TOTAL_ مدخلات",
                "sInfoEmpty": "يعرض 0 إلى 0 من 0 مدخلات",
                "sInfoFiltered": "(تصفية من _MAX_ إجمالي المدخلات)",
                "sLengthMenu": "عرض _MENU_ مدخلات",
                "sLoadingRecords": "جاري التحميل...",
                "sProcessing": "جاري المعالجة...",
                "sSearch": "بحث:",
                "sZeroRecords": "لم يتم العثور على نتائج",
                "oPaginate": {
                    "sFirst": "الأول",
                    "sLast": "الأخير",
                    "sNext": "التالي",
                    "sPrevious": "السابق"
				}
                },
                // "language": {
                //    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/ar.json"
                // },
				"lengthMenu": [5, 10, 15, 20] ,
            });
        });
    }).catch((error) => {
        console.error("❌ خطأ في تحميل DataTables:", error);
    });
}


})();
