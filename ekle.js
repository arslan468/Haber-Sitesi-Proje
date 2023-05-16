var haberler = {
    'Haber1': ['Haber Başlık', 'Haber'],
    'Haber2': ['Haber Başlık1', 'Haber1'],
    'Haber3': ['Haber Başlık2', 'Haber2']
    }

var haberHtml = '';

for (let index = 0; index < Object.keys(haberler).length; index++)
{
    haberHtml += '<div class="col-md-4 mt-5">' + Object.keys(haberler[index]) + '</div>'; 
}

window.addEventListener('load', function()
{
    $('#ekle').html(haberHtml);
    // $('#ekle').hover(function(event)
    // {
    //     var icerikHtml = '';
    //     var konular = dersler[$(event.target).text()];

    //     for (let i = 0; i < konular.length; i++) 
    //     {
    //         icerikHtml = '';
    //         icerikHtml += '<div class="col-md-4 mt-5">' + konular[i] + '</div>';
    //     }
    // });
});
