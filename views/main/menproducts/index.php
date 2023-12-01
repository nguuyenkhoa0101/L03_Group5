<?php 
   include_once('views/main/navbar.php');
?>
<main>
    <style>
    .card:hover {
        transform: scale(1.1);
        transition: transform 0.3s ease;
    }

    @media only screen and (max-width : 992px) {}

    @media only screen and (max-width : 575px) {}

    @media only screen and (max-width : 830px) {}

    @media screen and (max-width: 540px) {
        #advertisement-product {
            margin-top: 120px;
        }

    }
    </style>

    <!-- Items -->
    <div class="container-fluid py-2" style="margin-top: 80px">
        <div class="container-fluid px-4 px-lg-6 mt-4">
            <div style="display: flex; justify-content: flex-end; margin-top: 10px">
                <select name="" id=""
                    style="margin-left: auto; border-radius: 10px;  height: 30px; width: 300px; border-color: #ccc;">
                    <option value="">Sắp xếp theo</option>
                    <option value="">Giá cao đến thấp</option>
                    <option value="">Giá thấp đến cao</option>
                </select>
            </div>
            <div class="row" style="margin-top: 30px">

                <!-- Bộ lọc bên trái -->
                <div class="col-md-2 mb-3">
                    <div class="filter-section">
                        <h4>Filters</h4>
                        <div class="filter">
                            <label>Size</label>
                            <div class="filter-option">
                                <div class="filter-dropdown">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="small" id="size-small">
                                        <label class="form-check-label" for="size-small">Small</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="medium" id="size-medium">
                                        <label class="form-check-label" for="size-medium">Medium</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="large" id="size-large">
                                        <label class="form-check-label" for="size-large">Large</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filter">
                            <label>Color</label>
                            <div class="filter-option">
                                <div class="filter-dropdown">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="red" id="color-red">
                                        <label class="form-check-label" for="color-red">Red</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="blue" id="color-blue">
                                        <label class="form-check-label" for="color-blue">Blue</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="green" id="color-green">
                                        <label class="form-check-label" for="color-green">Green</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add additional filters here if needed -->
                    </div>
                </div>

                <!-- Các card bên phải -->
                <div class="col-md-10">
                    <div id="card-content"
                        class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-4 justify-content-center">
                        <?php 
            // Lặp qua danh sách sản phẩm và hiển thị card
            foreach ($menproducts as $menproduct) {
                echo '<div id="card" class="col mb-3">
                    <a href="index.php?page=main&controller=detail&id=' . $menproduct->id . '&action=index" class="card h-100 text-decoration-none">';
                
                if ($menproduct->sale) {
                    echo '<div class="badge bg-dark text-light position-absolute" style="top: 0.5rem; right: 0.5rem"> - ' . $menproduct->sale . '%</div>';
                }
            
                echo '<img class="card-img-top" src="' . $menproduct->img . '" alt="..." style="height: 80%; width: auto;">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <p class="product-name text-muted" style="font-size: 1em">' . $menproduct->name . '</p>
                            <span class="fw-bold">' . number_format($menproduct->price * (100 - $menproduct->sale) / 100, 0, ',', '.') . ' đ</span>
                            <span class="text-muted text-decoration-line-through">' . number_format($menproduct->price, 0, ',', '.') . ' đ</span>
                        </div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><!-- Optional: Keep this div if you want to maintain the same structure --></div>
                    </div>
                    </a>
                </div>';
            }
            
        ?>
                    </div>
                </div>


            </div>

        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">

                <li class="page-item">
                    <a class="page-link previous-page" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link .next-page" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>




    <script type="text/javascript">
    function getPageList(totalPages, page, maxLength) {
        function range(start, end) {
            return Array.from(Array(end - start + 1), (_, i) => i + start);
        }

        var sideWidth = maxLength < 9 ? 1 : 2;
        var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
        var rightWidth = (maxLength - sideWidth * 2 - 3) >> 1;

        if (totalPages <= maxLength) {
            return range(1, totalPages);
        }

        if (page <= maxLength - sideWidth - 1 - rightWidth) {
            return range(1, maxLength - sideWidth - 1).concat(0, range(totalPages - sideWidth + 1, totalPages));
        }

        if (page >= totalPages - sideWidth - 1 - rightWidth) {
            return range(1, sideWidth).concat(0, range(totalPages - sideWidth - 1 - rightWidth - leftWidth,
                totalPages));
        }

        return range(1, sideWidth).concat(0, range(page - leftWidth, page + rightWidth), 0, range(totalPages -
            sideWidth + 1, totalPages));
    }

    $(function() {
        var numberOfItems = $("#card-content #card").length;
        var limitPerPage = 8; //How many card items visible per a page
        var totalPages = Math.ceil(numberOfItems / limitPerPage);
        var paginationSize = 7; //How many page elements visible in the pagination
        var currentPage;

        function showPage(whichPage) {
            if (whichPage < 1 || whichPage > totalPages) return false;

            currentPage = whichPage;

            $("#card-content #card").hide().slice((currentPage - 1) * limitPerPage, currentPage * limitPerPage)
                .show();

            $(".pagination li").slice(1, -1).remove();

            getPageList(totalPages, currentPage, paginationSize).forEach(item => {
                $("<li>").addClass("page-item").addClass(item ? "current-page" : "dots")
                    .toggleClass("active", item === currentPage).append($("<a>").addClass("page-link")
                        .attr({
                            href: "javascript:void(0)"
                        }).text(item || "...")).insertBefore(".next-page");
            });

            $(".previous-page").toggleClass("disable", currentPage === 1);
            $(".next-page").toggleClass("disable", currentPage === totalPages);
            return true;
        }

        $(".pagination").append(
            $("<li>").addClass("page-item").addClass("previous-page").append($("<a>").addClass("page-link")
                .attr({
                    href: "javascript:void(0)"
                }).text("Prev")),
            $("<li>").addClass("page-item").addClass("next-page").append($("<a>").addClass("page-link")
                .attr({
                    href: "javascript:void(0)"
                }).text("Next"))
        );

        $("#card-content").show();
        showPage(1);

        $(document).on("click", ".pagination li.current-page:not(.active)", function() {
            return showPage(+$(this).text());
        });

        $(".next-page").on("click", function() {
            return showPage(currentPage + 1);
        });

        $(".previous-page").on("click", function() {
            return showPage(currentPage - 1);
        });
    });
    </script>
</main>

<?php
   include_once('views/main/footer.php');
?>