<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Expenses extends CI_Controller
{
    public function index()
    {
        $center_id = $this->input->get('center_id');
        $this->load->model('Expense_model');

        if ($center_id) {
            $data['expenses'] = $this->Expense_model->get_expenses_by_center($center_id);
        } else {
            $data['expenses'] = $this->Expense_model->get_all_expenses();
        }

        $this->load->view('superadmin/Expenses', $data);
    }
    // ...other methods...
}
?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get center_id from URL
    function getQueryParam(param) {
        let urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }
    const centerId = getQueryParam('center_id');

    if (centerId) {
        // Hide all rows not matching center_id
        document.querySelectorAll('[data-center-id]').forEach(function(row) {
            if (row.getAttribute('data-center-id') !== centerId) {
                row.style.display = 'none';
            } else {
                row.style.display = '';
            }
        });
    }
});
</script>