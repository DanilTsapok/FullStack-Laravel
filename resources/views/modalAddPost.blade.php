

<link rel='stylesheet' href="{{asset('css/modalAddPost.style.css')}}">
<div id="modalCreate" class="modal">
    <div class="modal-content">
        <div class="headerModal">
            <h4>Create post</h4>
            <span class="close">&times;</span>
        </div>
        
        <form action="{{ route('createPost.post') }}" method="POST"class="formCreatePost">
            @csrf
            @method('POST')
            <div class="input-container">
                <input type="text" id="name" name="name" placeholder="Title">
            </div>
            <div class="input-container">
                <textarea id="description" name="description"placeholder="Description" ></textarea>
            </div>
            <div>
                <button type="submit" style="display:flex;justify-content:center; width:100px;border: 2px solid #FFFFFF" >Publish</button>
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
        modal.style.display = "flex";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>