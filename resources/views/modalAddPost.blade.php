

<link rel='stylesheet' href="{{asset('css/modalAddPost.style.css')}}">
<div id="modalCreate" class="modal">
    <div class="modal-content">
        <div class="headerModal">
            <span class="close">&times;</span>
        </div>
        
        <form action="{{ route('createPost.post') }}" method="POST">
            @csrf
            @method('POST')
            <div>
                <input type="text" id="name" name="name" placeholder="Title">
            </div>
            <div>
                <textarea id="description" name="description"placeholder="Description" ></textarea>
            </div>
            <div>
                <button type="submit" >Publish</button>
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
        modal.style.display = "flex";
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