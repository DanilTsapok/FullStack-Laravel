

<link rel='stylesheet' href="{{asset('css/modalAddPost.style.css')}}">
<div id="modalCreate" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h5>Create Post</h5>
        <form action="{{ route('createPost.post') }}" method="POST">
            @csrf
            @method('POST')
            <div>
                <input type="text" id="name" name="name" placeholder="Product Name">
            </div>
            <div>
                <input type="file" id="image" name="image" >
            </div>

            <div>
                <textarea id="description" name="description"placeholder="Product Description" ></textarea>
            </div>
            <div>
                <button type="submit" class="submit">Create Product</button>
            </div>
        </form>
    </div>
</div>


<script>
    let modal = document.getElementById("modalCreate");
    let btn = document.getElementById("openModal");
    let secondBtn = document.getElementById("openModalSecond")
    let span = document.getElementsByClassName("close")[0];
    
    secondBtn.onclick = function(){
        modal.style.display = "block";
    }
    btn ? btn.onclick = function() {
        modal.style.display = "block";
    }: null
    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>