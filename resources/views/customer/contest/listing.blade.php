@extends("layouts.competition-main")
@section("content")
    <div class="container">
        <div class="row row-cols-2" style="margin-top: -70px">
            <div class="col">
                <h1>
                    Contests
                </h1>
            </div>
            <div class="col buton">
                <button>
                    <p>Add contest</p>
                </button>
            </div>
        </div>
        <div class="filter">
			<span>
				Filter
			</span>
            <ul>
                <li><a ><i class="fas fa-star"></i>Favourites</a></li>
            </ul>
        </div>
        <div class="fltr-item">
            <div class="row row-cols-2">
                <div class="col">
                    <p>
                        Level contests
                    </p>
                    <div class="select-wrapper">
                        <select name="business_level" id="business-level" class="select-brief">
                            <option value="" selected disabled hidden>Select Any Option</option>
                            <option value="Small">Small</option>
                            <option value="Medium">Medium</option>
                            <option value="Large">Large</option>
                        </select>
                    </div>
                </div>
                <div class="col default">
                    <p>
                        Sort by Participants
                    </p>
                    <div class="select-wrapper">
                        <select name="sort_by_participants" id="sort-by" class="select-brief">
                            <option value="" selected disabled hidden>Select Any Option</option>
                            <option value="5">Less than 5</option>
                            <option value="10">Less than 10</option>
                            <option value="20">Less than 20 </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row fltr-down">
                <div class="col">
                    <p>
                        Budget min
                    </p>
                    <input type="number" class="min" placeholder="min">
                </div>
                <div class="col">
                    <p>
                        Budget max
                    </p>
                    <input type="number" class="max" placeholder="max">
                </div>
                <div class="col dubble-btn">
                    <p>
                        <br>
                    </p>
                    <button class="status-filter active-status open">
                        Open
                    </button>
                    <button class="status-filter finish">
                        Finish
                    </button>
                </div>
            </div>
        </div>
        <div class="cnt" id="contest-container">
            <div class="row">
                <div class="col">
                    <img src="images/slider-1.png" alt="">
                </div>
                <div class="col-6">
                    <div class="description">
                        <h3>
                            Design for tehnology company
                        </h3>
                        <div class="icons">
                            <i class="fas fa-thumbtack"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="lmt">
                            <p class="limit">
                                Time limit: <span>20 day</span>
                            </p>
                            <p class="customer">
                                Customer: <span>akalikbergenov</span>
                            </p>
                        </div>
                        <div class="ftr">
                            <p class="smal">
                                Small
                            </p>
                            <p class="part">
                                Part garanted
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="dol">
                        <h2>
                            700$
                        </h2>
                        <p>
                            Price
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <div id="pagination-container"></div>
    </div>
@endsection