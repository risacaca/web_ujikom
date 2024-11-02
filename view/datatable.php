<script>
$('#tb_aneh').DataTable( {
    "ordering": false,
	"pageLength": 10,
	initComplete: function () {
		this.api().columns().every( function () {
			var column = this;
			var select = $('')
			.appendTo( $(column.footer()).empty() )
			.on( 'change', function () {
				var val = $.fn.dataTable.util.escapeRegex(
					$(this).val()
					);

				column
				.search( val ? '^'+val+'$' : '', true, false )
				.draw();
			} );

			column.data().unique().sort().each( function ( d, j ) {
				select.append( ''+d+'' )
			} );
		}
        );
	}
});
</script>