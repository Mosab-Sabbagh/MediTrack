<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">تأكيد الحذف</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                هل أنت متأكد من أنك تريد حذف هذا الدواء؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteButton">حذف</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteModal = document.getElementById('deleteConfirmationModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            // Get the button that triggered the modal
            const button = event.relatedTarget;
            // Extract info from data-bs-* attributes
            const medicineId = button.getAttribute('data-medicine-id');

            // Find the confirm delete button inside the modal
            const confirmButton = document.getElementById('confirmDeleteButton');

            // Set up the click handler to submit the correct form
            confirmButton.onclick = function () {
                document.getElementById('deleteForm-' + medicineId).submit();
            };
        });
    });
</script>