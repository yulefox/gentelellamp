@extends('layouts.master', ['widgets' => ['datatable']])
@section('page-title', '成本')
@section('page-brief', '成本沙盘计算')
@section('page-content')
@include('widgets.panel', ['title' => '成本', 'brief' => '成本沙盘计算', 'content' => 'coc.costs_detail'])
@endsection
@section('script-custom')
<!-- Datatables -->
<script>
  $(document).ready(function() {
    var costs = {
        yemanren: {
            7: 250,
        },
        sheshou: {
            7: 500,
        },
        pangzi: {
            7: 3500,
        },
        geburin: {
            6: 150,
        },
        boom: {
            6: 3500,
        },
        qiqiu: {
            6: 4500,
        },
        fashi: {
            6: 4000,
        },
        angel: {
            4: 10000,
        },
        dragon: {
            3: 33000,
        },
        pika: {
            3: 36000,
        }
    };
    var handleDataTableButtons = function() {
      if ($("#datatable-buttons").length) {
        $("#datatable-buttons").DataTable({
          dom: "Bfrtip",
          buttons: [
          {
            extend: "copy",
            className: "btn-sm"
          },
          {
            extend: "csv",
            className: "btn-sm"
          },
          {
            extend: "excel",
            className: "btn-sm"
          },
          {
            extend: "pdfHtml5",
            className: "btn-sm"
          },
          {
            extend: "print",
            className: "btn-sm"
          },
          ],
          responsive: true
        });
      }
    };

    TableManageButtons = function() {
      "use strict";
      return {
        init: function() {
          handleDataTableButtons();
        }
      };
    }();

    $('#datatable').dataTable();
    $('#datatable-keytable').DataTable({
      keys: true
    });

    $('#datatable-responsive').DataTable();

    $('#datatable-scroller').DataTable({
      ajax: "js/datatables/json/scroller-demo.json",
      deferRender: true,
      scrollY: 380,
      scrollCollapse: true,
      scroller: true
    });

    var table = $('#datatable-fixed-header').DataTable({
      fixedHeader: true
    });

    TableManageButtons.init();
  });
</script>
<!-- /Datatables -->
@endsection
