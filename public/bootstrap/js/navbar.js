/**
 * Created by ahmedhamdy on 4/8/16.
 */
$(function(){
    var booking = $('#booking');
    var city_id = $('#city_id');

    var booking_dropdown = '<li class="dropdown">' +
                                '<a href="#" class="dropdown-toggle" data-toggle="dropdown">' +
                                    ' Bookings <i class="fa fa-angle-down"></i>' +
                                '</a>' +
                                '<ul class="dropdown-menu">' +
                                    '<li>' +
                                        '<a href="/car/addcarrental/cid/'+city_id.val()+'">Car Rental</a>' +
                                    '</li>' +
                                    '<li>' +
                                        '<a href="/hotel/addnewhotelreservation/cid/'+city_id.val()+'">Hotel Reservation</a>' +
                                    '</li>'+
                                '</ul>' +
                            '</li>';

    console.log(booking.children().eq(2));
    booking.children().eq(2).after(booking_dropdown)

    alert('Done');

});