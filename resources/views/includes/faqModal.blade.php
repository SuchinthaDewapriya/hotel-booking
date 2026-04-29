<div class="modal fade" id="faqModal">
  <div class="modal-dialog">
    <form id="faqForm">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5>Add FAQ</h5>
            </div>

            <div class="modal-body">
                <input type="text" name="question" class="form-control mb-2" placeholder="Question">
                <textarea name="answer" class="form-control" placeholder="Answer"></textarea>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
  </div>
</div>