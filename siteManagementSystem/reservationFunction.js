async function deleteReservation(ID) {
    const formData = new FormData;
    formData.append('id', ID);

    try{
        const deleteRes = await fetch('deleteReservation.php', {
            method: "POST",
            body: formData
        });

        if(deleteRes){
            alert('Record Deleted');
            window.location.reload();
        }
        else{
            alert('Operation failed');
        }
    }
    catch(err){
        alert(err);
    }
}

async function updateReservation(id) {
    function formatDateTime(date) {
        const d = new Date(date);

        const year = d.getFullYear();
        const month = String(d.getMonth() + 1).padStart(2, '0'); // Months are zero-based
        const day = String(d.getDate()).padStart(2, '0');
        const hours = String(d.getHours()).padStart(2, '0');
        const minutes = String(d.getMinutes()).padStart(2, '0');
        const seconds = String(d.getSeconds()).padStart(2, '0');

        return `${year}/${month}/${day} ${hours}:${minutes}:${seconds}`;
    }
    
    const location = document.getElementById('location-res-' + id).value;
    const username = document.getElementById('username-res-' + id).value;
    const dateTime = document.getElementById('dateTime-res-' + id).value;
    const message = document.getElementById('message-res-' + id).value;

    const formData = new FormData;

    if(location){
        const branch = ['QUEZON CITY', 'MAKATI CITY', 'DAVAO CITY', 'QUEZON', 'MAKATI', 'DAVAO'];

        if(branch.includes(location.toUpperCase())){
            const newDate = dateTime ? formatDateTime(dateTime) : formatDateTime(new Date());

            formData.append('id', id);
            formData.append('location', location);
            formData.append('username', username);
            formData.append('dateTime', newDate);
            formData.append('message', message);
            
            try{
                const updateReservation = await fetch('updateReservation.php', {
                    method: "POST",
                    body: formData
                });

                if(updateReservation){
                    alert('Record Updated');
                    window.location.reload();
                }
                else{
                    alert('Operation failed');
                }
            }
            catch(err){
                alert(err);
            }
        }
        else{
            alert('Please select the branch that is available')
        }
    }
    else{
        alert('Field Cannot be empty');
    }
}