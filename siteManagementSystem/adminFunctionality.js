function modifyReviewTable(operation, id){
    switch(operation){
        case "edit":
                document.getElementById('showReview-' + id).style.display = "none";
                document.getElementById('editReview-' + id).style.display = "table-row";
            break;

        case "cancel":
                document.getElementById('showReview-' + id).style.display = "table-row";
                document.getElementById('editReview-' + id).style.display = "none";
            break;
    }
}

function modifyReservationTable(operation, id){
    switch(operation){
        case "edit":
                document.getElementById('showReservation-' + id).style.display = "none";
                document.getElementById('editReservation-' + id).style.display = "table-row";
            break;

        case "cancel":
                document.getElementById('showReservation-' + id).style.display = "table-row";
                document.getElementById('editReservation-' + id).style.display = "none";
            break;
    }
}

function modifyDishTable(operation, id){
    switch(operation){
        case "edit":
                document.getElementById('showDish-' + id).style.display = "none";
                document.getElementById('editDish-' + id).style.display = "table-row";
            break;

        case "cancel":
                document.getElementById('showDish-' + id).style.display = "table-row";
                document.getElementById('editDish-' + id).style.display = "none";
            break;
    }
}