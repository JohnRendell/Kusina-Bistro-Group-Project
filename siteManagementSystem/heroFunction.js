var heroImage = document.getElementById('hero-image-input');
var imageFile = '';

heroImage.addEventListener('change', event=>{
    var file = event.target.files[0];

    if(file){
        document.getElementById('prevDiv').style.display = 'block';
        const fileReader = new FileReader();

        fileReader.onload = function(e) {
            document.getElementById('prevImage-Hero').src = e.target.result;
        };

        fileReader.readAsDataURL(file);
        imageFile = file;
    }
});

async function insertHero(){
    if(imageFile){
        const formData = new FormData;
        formData.append('uploadImage', imageFile);

        try{
            const addHero = await fetch('insertHeroAdmin.php', {
                method: "POST",
                body: formData
            });

            if(addHero){
                alert('record added');
                window.location.reload();
            }
            else{
                alert('operation failed');
            }
        }
        catch(err){
            alert(err);
        }
    }
    else{
        alert('Choose an image')
    }
}

async function deleteHero(id, image){
    const formData = new FormData;

    formData.append('image', image);
    formData.append('id', id);

    try{
        const addHero = await fetch('deleteHero.php', {
            method: "POST",
            body: formData
        });

        if(addHero){
            alert('record deleted');
            window.location.reload();
        }
        else{
            alert('operation failed');
        }
    }
    catch(err){
        alert(err);
    }
}