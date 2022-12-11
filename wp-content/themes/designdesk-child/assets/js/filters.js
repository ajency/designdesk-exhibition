$(".filter-list-item").click(function () {
  filterPostType();
});

function resetFilter(element){
  let defaultValue = $(element).parents('.field-group').find('.dd-select li[data-value=hide]').text();
  $(element).parents('.field-group').find('.select-styled').text(defaultValue);
  $(element).hide();
  $(element).parents('.field-group').find('.dd-select li.filter-list-item').removeClass('is-selected');
  $(element).parents('.field-group').find('.dd-select li[data-value=hide]').addClass('is-selected');

  filterPostType();
}

function filterPostType() {
  //console.log("Filtered current page : " + currentPage);
  let selectList = $(".dd-filters").find("ul.dd-select");

  let filterValues = [];

  $(selectList).each(function () {
    let ListValue = $(this).find("li.filter-list-item");
    $(ListValue).each(function () {
      if ($(this).hasClass("is-selected")) {
        let selectedListId = $(this)
          .parents(".select")
          .find("select")
          .attr("id");
        let selectedValue = $(this).data("value");
        let selectedSlug = $(this).data("slug");
        filterValues.push({
          listId: selectedListId,
          selectedValue: selectedValue,
          selectedSlug: selectedSlug,
        });
      }
    });
  });

  //console.log(filterValues);

  let stall_size, industry, location;

  $(filterValues).each(function () {
    if ($(this)[0].listId == "stallSizes") {
      stall_size = $(this)[0].selectedValue;
    }

    if ($(this)[0].listId == "industries") {
      industry = $(this)[0].selectedSlug;
    }
    if ($(this)[0].listId == "locations") {
      location = $(this)[0].selectedValue;
    }
  });

  //console.log("passed values : "+ stall_size, industry, location);

  $.ajax({
    type: "POST",
    url: "../wp-admin/admin-ajax.php",
    dataType: "json",
    data: {
      action: "filter_portfolios",
      paged: 1,
      stall_size,
      industry,
      location,
    },
    success: function (res) {
      $(".dd-card-list").empty();
      $(".dd-card-list").append(res.html);
      //console.log("maximum filtered pages : " + res.max);
      if(res.max > 1){
        $('#load-more').show();
        //currentPage++;
        dd_load_more_data( 1, res.max, res.stallSize, res.industry, res.location);
      }else{
        $('#load-more').hide();
      }
    },
  });
}
