<?php
defined('PATH') or exit('No direct script.');
/**
*
*/
class pesan extends controller
{

  public function __construct()
  {
    controller::__construct();
  }

  public function index()
  {
    $data['title'] = 'Pesan';
    if (!isset($_SESSION['logged_in'])) {
      $_SESSION['alert'] = [
        'type' => 'red',
        'value' => 'No direct access.',
      ];
      redirect();
    } else {
      
      $data['recordPesan'] = controller::select('pesan');
      controller::loadView('_header', $data);
      controller::loadView('pesan_v', $data);
      controller::loadView('_footer', $data);
    }
  }
  public function delete($value='')
  {
    if (!isset($_SESSION['logged_in'])) {
      $_SESSION['alert'] = [
        'type' => 'red',
        'value' => 'No direct access.',
      ];
      redirect();
    } else {
      if (!isset($_GET['i'])) {
        $_SESSION['alert'] = [
          'type' => 'red',
          'value' => 'No direct access.',
        ];
        redirect('?c=pesan');
      } else {
        $id_pesan = $_GET['i'];
        $where = [
          'id_pesan' => $id_pesan,
        ];
        controller::deleteRecord('pesan', $where);
        $_SESSION['alert'] = [
          'type' => 'Green',
          'value' => 'Deleting pesan success.',
        ];
        redirect('?c=pesan');
      }
    }
  }
  public function detail($value='')
  {
    $data['title'] = 'Pesan';
    if (!isset($_SESSION['logged_in'])) {
      $_SESSION['alert'] = [
        'type' => 'red',
        'value' => 'No direct access.',
      ];
      redirect();
    } else {
      if (!isset($_GET['i'])) {
        $_SESSION['alert'] = [
          'type' => 'red',
          'value' => 'No direct access.',
        ];
        redirect('?c=pesan');
      } else {
        $id = $_GET['i'];
        $data['recordPesan'] = controller::select('pesan',['id_pesan' => $id])->fetch_object();

        controller::loadView('_header', $data);
        controller::loadView('pesan_detail_v', $data);
        controller::loadView('_footer', $data);
      }
    }
  }
}
?>
