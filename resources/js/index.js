
const filterButton = $('#filterButton');

let sortByHtmlElement = $('#active_sort_option').first().text();
let orderBy = 'name';
let paginate = $('a.product-actual-count').first().text();
let apiPage = 1;



filterButton.click((e) => {

    e.preventDefault();

    apiPage = 1;
    sendRequest(paginate, apiPage, orderBy);
});


 // update sorting option
$('a.sort-option').click(function (e) {

    e.preventDefault();

    // update displayed sorting option for user on view
    sortByHtmlElement = $(this).text();
    $('#active_sort_option').first().text(sortByHtmlElement);

    // update sorting option for api request
    orderBy = $(this).data('sort-option');

    sendRequest(paginate, apiPage, orderBy);

})


// ( onclick on dropdown with displayed products per page)
$('div.product-count a').click(function (e)
{
    e.preventDefault();
    // updates display per page number
    $('a.product-actual-count').text($(this).text());

    // updates pagination number
    paginate = $('a.product-actual-count').first().text();

    apiPage = 1;
    sendRequest(paginate, apiPage, orderBy);
});



function generateProductElement(productContainer, productData) {

    // imageStoragePath and defaultImage are js variables coming from view.blade
    const imageUrl = productData.image_path ? imageStoragePath + productData.image_path : defaultImage;
    let imageElement;

    if (productData.image_path) {
        imageElement = `<img src="${imageUrl}" class="img-fluid mx-auto d-block" loading="lazy" alt="Card image cap">`;
    }
    else
    {
        imageElement = `<img src="${defaultImage}" class="img-fluid mx-auto d-block" width="240" height="240" loading="lazy" alt="Default image" >`;
    }

    const div = $(`
        <div class="col-6 col-md-6 col-lg-4 mb-3">
            <div class="card h-100 border-0">
                <div class="card-img-top">
                    ${imageElement}
                </div>
                <div class="card-body text-center">
                    <h4 class="card-title">
                        <a href="/products/${productData.id}"
                           class="font-weight-bold text-dark text-uppercase small">${productData.name}</a>
                    </h4>
                    <h5 class="card-price small text-black fs-6">
                        <i>
                            <strong class="text-warning">PLN </strong>
                            <span class="fw-bolder">${productData.price}</span>
                        </i>
                    </h5>
                </div>
            </div>
        </div>
    `);

    productContainer.append(div);
}



function updateNavigation(paginationData) {

    let paginationNav = $('#products_pagination_nav ul.pagination');
    paginationNav.empty(); // Clear old pagination

    // Previous button
    if (paginationData.prev_page_url)
    {
        paginationNav.append(
            `<li class="page-item">
                <a class="page-link" href="#" data-page="${paginationData.current_page - 1}">‹</a>
            </li>`
        );
    }
    else
    {
        paginationNav.append(
            `<li class="page-item disabled">
                <span class="page-link">‹</span>
            </li>`
        );
    }

    // Page numbers
    for (let i = 1; i <= paginationData.last_page; i++) {
        if (i === paginationData.current_page)
        {
            paginationNav.append(
                `<li class="page-item active"><span class="page-link">${i}</span></li>`
            );
        }
        else
        {
            paginationNav.append(
                `<li class="page-item"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`
            );
        }
    }

    // Next button
    if (paginationData.next_page_url)
    {
        paginationNav.append(
            `<li class="page-item">
                <a class="page-link" href="#" data-page="${paginationData.current_page + 1}">›</a>
            </li>`
        );
    }
    else
    {
        paginationNav.append(
            `<li class="page-item disabled">
                <span class="page-link">›</span>
            </li>`
        );
    }

    // Attach event listener for pagination clicks
    $('.page-link').click(function(e) {
        e.preventDefault();
        let page = $(this).data('page');
        if (page) {
            sendRequest(paginationData.per_page, page, orderBy);
        }
    });
}

function removePageParam() {

    const url = new URL(window.location);

    if (url.searchParams.has('page')) {
        url.searchParams.delete('page');
        window.history.replaceState({}, '', url);
    }

}


function sendRequest(productsPaginationNumber, apiPage, orderBy)
{
    const formData = $('#productsForm').serialize();
    const paramsData = formData + "&" + $.param({paginate: productsPaginationNumber}) +
        "&" + $.param({page: apiPage}) +
        "&" + $.param({orderBy: orderBy});

    // if user used pagination nav from view.blade.php it would generate ?page param
    removePageParam();

    $.ajax({
        url: "/",
        type: 'GET',
        data: paramsData,
        dataType: 'json',
        success: function(res)
        {
            let productsContainer = $('div#products-wrapper');
            productsContainer.empty();

            const products = res.data.products.data;
            $.each(products, function(index, product) {
                generateProductElement(productsContainer, product);
            });

            $('#productsToShow').text(res.data.products.total)

            // Remove old pagination and update with new one
            $('#products_pagination_nav').empty().append('<nav><ul class="pagination"></ul></nav>');

            // Update pagination dynamically
            updateNavigation(res.data.products);

        },
        error: function()
        {
            alert('something went wrong');
        }
    });

}
