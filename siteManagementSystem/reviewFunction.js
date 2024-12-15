//for deleting row in review table
async function deleteReviewRow(id){
    const formData = new FormData;
    formData.append('id', id);

    try{
        const passData = await fetch('deleteReview.php', {
            method: "POST",
            body: formData
        });

        if(passData){
            alert('record deleted');
            window.location.reload();
        }
        else{
            alert("Operation failed");
        }
    }
    catch(err){
        alert(err);
    }
}

//for saving the row in review row
async function saveReviewRow(id){
    const username = document.getElementById('username-' + id).value;
    const review = document.getElementById('review-' + id).value;
    const rating = document.getElementById('rating-' + id).value;

    if(username && review && rating){
        if(rating <= 5){
            const formData = new FormData;
            formData.append('id', id);
            formData.append('username', username);
            formData.append('review', review);
            formData.append('rating', rating);

            try{
                const passData = await fetch('updateReview.php', {
                    method: "POST",
                    body: formData
                });

                if(passData){
                    alert('record updated');
                    window.location.reload();
                }
                else{
                    alert("Operation failed");
                }
            }
            catch(err){
                alert(err);
            }
        }
        else{
            alert('Max of 5 rating only')
        }
    }
    else{
        alert('Empty field cannot accepted');
    }
}

//for inserting new review record via admin dashboard
async function insertReview(userID, reviewID, ratingID){
    const username = document.getElementById(userID).value;
    const review = document.getElementById(reviewID).value;
    const rating = document.getElementById(ratingID).value;

    if(username && review && rating){
        if(rating <= 5){
            const formData = new FormData;
            formData.append('username', username);
            formData.append('review', review);
            formData.append('rating', rating);

            try{
                const passData = await fetch('insertReviewAdmin.php', {
                    method: "POST",
                    body: formData
                });

                if(passData){
                    alert('record updated');
                    window.location.reload();
                }
                else{
                    alert("Operation failed");
                }
            }
            catch(err){
                alert(err);
            }
        }
        else{
            alert('Max of 5 rating only')
        }
    }
    else{
        alert('Empty field cannot accepted');
    }
}