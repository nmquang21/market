jQuery(document).ready(function () {
    jQuery('#open-list-cate').click(function () {
        jQuery('#list-cate').slideToggle(250);
    })

    var engine1 = new Bloodhound({
        remote: {
            url: 'search/name?value=%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    var engine2 = new Bloodhound({
        remote: {
            url: 'search/category?value=%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    $(".search-input").typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, [
        {
            source: engine1.ttAdapter(),
            name: 'students-name',
            display: function(data) {
                return data.name;
            },
            templates: {
                empty: [

                    // '<div class="header-title">Product</div><div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                ],
                header: [
                    '<div class="list-group" style="width:470px"></div>'
                ],
                suggestion: function (data) {
                    return '<a href="product-detail/' + data.id + '" class="list-group-item">' + data.name + '</a>';
                }
            }
        },
        {
            source: engine2.ttAdapter(),
            name: 'students-email',
            display: function(data) {
                return data.email;
            },
            templates: {
                empty: [
                    // '<div class="header-title">Category</div><div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                ],
                header: [
                    '<div class="list-group"style="width:470px"></div>'
                ],
                suggestion: function (data) {
                    return '<a href="category/' + data.id + '" class="list-group-item">' + data.name + '</a>';
                }
            }
        }
    ]);
})
