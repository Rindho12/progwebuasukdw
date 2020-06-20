<?php
defined('PATH') or exit('No direct script.');
?>
<style>
  @media print {
    #toggle-aside {
      display: none !important;
    }
    aside {
      display: none !important;
    }
    footer {
      display: none !important;
    }
    #reservation-print {
      display: none !important;
    }
    .print-show {
      display: initial !important;
    }
    .print-none {
      display: none !important;
    }
    p {
      margin: 0;
    }
    table.9pt td {
      font-size: 9pt;
    }
    table.table thead tr th {
      background: transparent;
      border-top: none !important;
      border-left: none !important;
      border-right: none !important;
      color: black !important;
      border-bottom: 1px solid rgba(13, 37, 218, 1);
    }
    table.table tbody tr td {
      background: transparent !important;
      border-top: none !important;
      border-left: none !important;
      border-right: none !important;
      border-bottom: none !important;
      color: black !important;
    }
    .margin-top {
      margin-top: 20px;
    }
    .margin-bottom {
      margin-bottom: 20px;
    }
    .border-bottom {
      border-bottom: 2px solid rgba(17, 21, 51, 1);
    }
    .text-primary-color {
      color: rgba(13, 37, 218, 1);
    }
    .text-color-grey {
      color: grey;
    }
  }
</style>
