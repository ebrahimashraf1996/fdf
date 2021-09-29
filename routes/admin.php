<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
 * These Routes Are Available only For Admin After Login to Dashboard
 *
 * Dashboard Routes
 */
Route::group([ 'middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Dashboard'], function () {

    ################################  Admin Home Page  ##########################################
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');



    ############################### start Main Section Routs #####################################

    Route::group(['prefix' => 'main-section'], function () {
        Route::get('/', 'MainSectionController@index')->name('admin.main.section');
        Route::get('edit/{id}', 'MainSectionController@edit')->name('admin.main.section.edit');
        Route::post('update/{id}', 'MainSectionController@update')->name('admin.main.section.update');
    });

    ############################### End Main Section Routs #####################################


    ############################### start About us Section Routs #####################################

    Route::group(['prefix' => 'about-us-section'], function () {
        Route::get('/', 'AboutUsController@sectionIndex')->name('admin.about.section');
        Route::get('edit/{id}', 'AboutUsController@sectionEdit')->name('admin.about.section.edit');
        Route::post('update/{id}', 'AboutUsController@sectionUpdate')->name('admin.about.section.update');
    });

    ############################### End About us Section Routs #####################################


    ############################### start About us Cards Routs #####################################

    Route::group(['prefix' => 'about-us-cards'], function () {
        Route::get('/', 'AboutUsController@cardsIndex')->name('admin.about.cards');
        Route::get('edit/{id}', 'AboutUsController@cardEdit')->name('admin.about.card.edit');
        Route::post('update/{id}', 'AboutUsController@cardUpdate')->name('admin.about.card.update');
        Route::get('change-status/{id}', 'AboutUsController@cardChangeStatus')->name('admin.about.card.change.status');

    });
    ############################### End About us Cards Routs #####################################


    ############################### start Gallery Routs #####################################

    Route::group(['prefix' => 'gallery'], function () {
        Route::get('/', 'GalleryController@index')->name('admin.gallery');
        Route::get('create', 'GalleryController@create')->name('admin.gallery.create');
        Route::post('save', 'GalleryController@save')->name('admin.gallery.save');
        Route::post('store', 'GalleryController@store')->name('admin.gallery.store');
        Route::get('delete/{id}', 'GalleryController@destroy')->name('admin.gallery.delete');
        Route::get('change-status/{id}', 'GalleryController@changeStatus')->name('admin.gallery.change.status');
    });

    ############################### End Gallery Routs #####################################


    ############################### start Goal Section Routs #####################################

    Route::group(['prefix' => 'goal-section'], function () {
        Route::get('/', 'GoalsController@index')->name('admin.goal.section');
        Route::get('create', 'GoalsController@create')->name('admin.goal.section.create');
        Route::post('store', 'GoalsController@store')->name('admin.goal.section.store');
        Route::get('edit/{id}', 'GoalsController@edit')->name('admin.goal.section.edit');
        Route::post('update/{id}', 'GoalsController@update')->name('admin.goal.section.update');
        Route::get('delete/{id}', 'GoalsController@destroy')->name('admin.goal.section.delete');
        Route::get('change-status/{id}', 'GoalsController@changeStatus')->name('admin.goal.section.change.status');
    });

    ############################### End Goal Section Routs #####################################


    ############################### start Goal photo Routs #####################################

    Route::group(['prefix' => 'goal-photo'], function () {
        Route::get('/', 'GoalsController@photoIndex')->name('admin.goal.photo.section');
        Route::get('edit/{id}', 'GoalsController@photoEdit')->name('admin.goal.photo.section.edit');
        Route::post('update/{id}', 'GoalsController@photoUpdate')->name('admin.goal.photo.section.update');
        });

    ############################### End Goal photo Routs #####################################


    ############################### start Commitment Routs #####################################

    Route::group(['prefix' => 'commitment'], function () {
        Route::get('/', 'CommitmentController@index')->name('admin.commit');
        Route::get('edit/{id}', 'CommitmentController@edit')->name('admin.commit.edit');
        Route::post('update/{id}', 'CommitmentController@update')->name('admin.commit.update');
    });
    ############################### End Commitment Routs #####################################


    ############################### start Services Sections Routs #####################################

    Route::group(['prefix' => 'services'], function () {
        Route::get('/', 'ServicesController@index')->name('admin.services');
        Route::get('create', 'ServicesController@create')->name('admin.services.create');
        Route::post('store', 'ServicesController@store')->name('admin.services.store');
        Route::get('edit/{id}', 'ServicesController@edit')->name('admin.services.edit');
        Route::post('update/{id}', 'ServicesController@update')->name('admin.services.update');
        Route::get('delete/{id}', 'ServicesController@destroy')->name('admin.services.delete');
        Route::get('change-status/{id}', 'ServicesController@changeStatus')->name('admin.services.change.status');
    });

    ############################### End Services Sections Routs #####################################


    ############################### start Why us Reasons Routs #####################################

    Route::group(['prefix' => 'why-us-reasons'], function () {
        Route::get('/', 'WhyUsController@index')->name('admin.why-us.reasons');
        Route::get('create', 'WhyUsController@create')->name('admin.why-us.reasons.create');
        Route::post('store', 'WhyUsController@store')->name('admin.why-us.reasons.store');
        Route::get('edit/{id}', 'WhyUsController@edit')->name('admin.why-us.reasons.edit');
        Route::post('update/{id}', 'WhyUsController@update')->name('admin.why-us.reasons.update');
        Route::get('delete/{id}', 'WhyUsController@destroy')->name('admin.why-us.reasons.delete');
        Route::get('change-status/{id}', 'WhyUsController@changeStatus')->name('admin.why-us.reasons.change.status');
    });

    ############################### End Why us Reasons Routs #####################################


    ############################### start Why us Para Routs #####################################

    Route::group(['prefix' => 'why-us-paragraph'], function () {
        Route::get('/', 'WhyUsController@paraIndex')->name('admin.why-us.para');
        Route::get('edit/{id}', 'WhyUsController@paraEdit')->name('admin.why-us.para.edit');
        Route::post('update/{id}', 'WhyUsController@paraUpdate')->name('admin.why-us.para.update');
    });
    ############################### End Why us Para Routs #####################################

    ############################### start  Contacts Routs #####################################

    Route::group(['prefix' => 'contact-us'], function () {
        Route::get('/', 'ContactUsController@index')->name('admin.contact.us');
        Route::get('edit/{id}', 'ContactUsController@edit')->name('admin.contact.us.edit');
        Route::post('update/{id}', 'ContactUsController@update')->name('admin.contact.us.update');
    });

    ############################### End Contacts Routs #####################################



});













/*
    ################################ Start Admin Info Routs  ##########################################

    // Get All Admins
    Route::get('/all', 'AdminAllController@index')->name('admin.all');

    // Add New Admin
    Route::get('/add-new-admin', 'AddNewAdminController@create')->name('admin.add.new.admin');
    Route::post('/store-new-admin', 'AddNewAdminController@store')->name('admin.store.new.admin');

    // edit Admin Info
    Route::get('/admin-info/edit/{id}', 'AdminInfoEditController@editInfo')->name('admin.info.edit');
    Route::post('/admin-info/update/{id}', 'AdminInfoEditController@updateInfo')->name('admin.info.update');

    ################################ End Admin Info Routs  ##########################################



    ############################### Start Project Info Routs ##################################

    Route::group(['prefix' => 'project-info'], function () {
        Route::get('edit', 'ProjectInfoController@edit')->name('project.info.edit');
        Route::post('update/{id}', 'ProjectInfoController@update')->name('project.info.update');
    });

    ############################### End Project Info Routs ##################################


    ############################### Start Nav Lists Routs ###################################

    Route::group(['prefix' => 'navbar-lists'], function () {
        Route::get('/', 'NavListsController@index')->name('admin.navbar.lists');

        Route::get('edit/{id}', 'NavListsController@edit')->name('admin.navbar.lists.edit');
        Route::post('update/{id}', 'NavListsController@update')->name('admin.navbar.lists.update');

        Route::get('change-status/{id}', 'NavListsController@changeStatus')->name('admin.navbar.lists.change.status');
    });

    ############################### End Nav Lists Routs #####################################


    ############################### start Slider Images Routs #####################################

    Route::group(['prefix' => 'slider-images'], function () {
        Route::get('/', 'SliderImagesController@index')->name('admin.slider.images');
        Route::get('create', 'SliderImagesController@create')->name('admin.slider.images.create');
        Route::post('store', 'SliderImagesController@store')->name('admin.slider.images.store');
        Route::get('edit/{id}', 'SliderImagesController@edit')->name('admin.slider.images.edit');
        Route::post('update/{id}', 'SliderImagesController@update')->name('admin.slider.images.update');
        Route::get('delete/{id}', 'SliderImagesController@destroy')->name('admin.slider.images.delete');
        Route::get('change-status/{id}', 'SliderImagesController@changeStatus')->name('admin.slider.images.change.status');
    });

    ############################### End Slider Images Routs #####################################

    ############################### start First Large Sections Routs #####################################

    Route::group(['prefix' => 'first-sections'], function () {
        Route::get('/', 'LargeSectionsController@index')->name('admin.large.sections');
        Route::get('create', 'LargeSectionsController@create')->name('admin.large.sections.create');
        Route::post('store', 'LargeSectionsController@store')->name('admin.large.sections.store');
        Route::get('edit/{id}', 'LargeSectionsController@edit')->name('admin.large.sections.edit');
        Route::post('update/{id}', 'LargeSectionsController@update')->name('admin.large.sections.update');
        Route::get('delete/{id}', 'LargeSectionsController@destroy')->name('admin.large.sections.delete');
        Route::get('change-status/{id}', 'LargeSectionsController@changeStatus')->name('admin.large.sections.change.status');
        Route::get('remove-photo/{id}', 'LargeSectionsController@removePhoto')->name('admin.large.sections.remove.photo');
    });

    ############################### End First Large Sections Routs #####################################

    ############################### start Second Large Sections Routs #####################################

    Route::group(['prefix' => 'second-sections'], function () {
        Route::get('/', 'SecondSectionController@index')->name('admin.second.sections');
        Route::get('create', 'SecondSectionController@create')->name('admin.second.sections.create');
        Route::post('store', 'SecondSectionController@store')->name('admin.second.sections.store');
        Route::get('edit/{id}', 'SecondSectionController@edit')->name('admin.second.sections.edit');
        Route::post('update/{id}', 'SecondSectionController@update')->name('admin.second.sections.update');
        Route::get('delete/{id}', 'SecondSectionController@destroy')->name('admin.second.sections.delete');
        Route::get('change-status/{id}', 'SecondSectionController@changeStatus')->name('admin.second.sections.change.status');
        Route::get('remove-photo/{id}', 'SecondSectionController@removePhoto')->name('admin.second.sections.remove.photo');
    });

    ############################### End Second Large Sections Routs #####################################

    ############################### start Footer Section Contacts Routs #####################################

    Route::group(['prefix' => 'footer-section-contact'], function () {
        Route::get('/', 'FooterSectionContactsController@index')->name('admin.footer.section.contacts');
        Route::get('create', 'FooterSectionContactsController@create')->name('admin.footer.section.contacts.create');
        Route::post('store', 'FooterSectionContactsController@store')->name('admin.footer.section.contacts.store');
        Route::get('edit/{id}', 'FooterSectionContactsController@edit')->name('admin.footer.section.contacts.edit');
        Route::post('update/{id}', 'FooterSectionContactsController@update')->name('admin.footer.section.contacts.update');
        Route::get('delete/{id}', 'FooterSectionContactsController@destroy')->name('admin.footer.section.contacts.delete');
        Route::get('change-status/{id}', 'FooterSectionContactsController@changeStatus')->name('admin.footer.section.contacts.change.status');
    });

    ############################### End Footer Section Contacts Routs #####################################

    ############################### start Footer Section Right paragraph Routs #####################################

    Route::group(['prefix' => 'footer-section-paragraph'], function () {
        Route::get('/', 'FooterSectionParagraphController@index')->name('admin.footer.section.paragraphs');
        Route::get('create', 'FooterSectionParagraphController@create')->name('admin.footer.section.paragraphs.create');
        Route::post('store', 'FooterSectionParagraphController@store')->name('admin.footer.section.paragraphs.store');
        Route::get('edit/{id}', 'FooterSectionParagraphController@edit')->name('admin.footer.section.paragraphs.edit');
        Route::post('update/{id}', 'FooterSectionParagraphController@update')->name('admin.footer.section.paragraphs.update');
        Route::get('delete/{id}', 'FooterSectionParagraphController@destroy')->name('admin.footer.section.paragraphs.delete');
        Route::get('change-status/{id}', 'FooterSectionParagraphController@changeStatus')->name('admin.footer.section.paragraphs.change.status');
    });

    ############################### End Footer Section Right paragraph Routs #####################################

    ############################### start Products Routs #####################################

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', 'ProductController@index')->name('admin.products');
        Route::get('create', 'ProductController@create')->name('admin.products.create');
        Route::post('store', 'ProductController@store')->name('admin.products.store');
        Route::get('edit/{id}', 'ProductController@edit')->name('admin.products.edit');
        Route::post('update/{id}', 'ProductController@update')->name('admin.products.update');
        Route::get('delete/{id}', 'ProductController@destroy')->name('admin.products.delete');
        Route::get('change-status/{id}', 'ProductController@changeStatus')->name('admin.products.change.status');


        ###########  Start Product Images Routes ############
        Route::get('images/{id}', 'ProductController@showImages')->name('admin.products.show.images');
        Route::get('images/create/{id}', 'ProductController@addImages')->name('admin.product.images.create');
        Route::post('images/save', 'ProductController@saveImages')->name('admin.product.images.save');
        Route::post('images/store', 'ProductController@storeImages')->name('admin.product.images.store');
        Route::get('single-image/delete/{imageId}', 'ProductController@imageDestroy')->name('admin.product.images.delete');
        Route::get('single-image/change-status/{imageId}', 'ProductController@imageChangeStatus')->name('admin.product.images.change.status');
        ###########  End Product Images Routes ############
    });

    ############################### End Products Routs #####################################


    ############################### start Products Routs #####################################

    Route::group(['prefix' => 'offers'], function () {
        Route::get('/', 'OffersController@index')->name('admin.offers');
        Route::get('create', 'OffersController@create')->name('admin.offers.create');
        Route::post('store', 'OffersController@store')->name('admin.offers.store');
        Route::get('edit/{id}', 'OffersController@edit')->name('admin.offers.edit');
        Route::post('update/{id}', 'OffersController@update')->name('admin.offers.update');
        Route::get('delete/{id}', 'OffersController@destroy')->name('admin.offers.delete');
        Route::get('change-status/{id}', 'OffersController@changeStatus')->name('admin.offers.change.status');

    });

    ############################### End Products Routs #####################################


    ############################### start Ads Routs #####################################

    Route::group(['prefix' => 'ads'], function () {
        Route::get('/', 'AdsController@index')->name('admin.ads');
        Route::get('create', 'AdsController@create')->name('admin.ads.create');
        Route::post('store', 'AdsController@store')->name('admin.ads.store');
        Route::get('edit/{id}', 'AdsController@edit')->name('admin.ads.edit');
        Route::post('update/{id}', 'AdsController@update')->name('admin.ads.update');
        Route::get('delete/{id}', 'AdsController@destroy')->name('admin.ads.delete');
        Route::get('change-status/{id}', 'AdsController@changeStatus')->name('admin.ads.change.status');
    });

    ############################### End Product Ads Routs #####################################


    ############################### start Social Contacts Routs #####################################

    Route::group(['prefix' => 'social'], function () {
        Route::get('/', 'SocialController@index')->name('admin.social');
        Route::get('edit/{id}', 'SocialController@edit')->name('admin.social.edit');
        Route::post('update/{id}', 'SocialController@update')->name('admin.social.update');
        Route::get('change-status/{id}', 'SocialController@changeStatus')->name('admin.social.change.status');
    });

    ############################### End Products Routs #####################################


    ############################### start certificate_p Routs #####################################

    Route::group(['prefix' => 'certificate'], function () {
        Route::get('/', 'CertificationController@index')->name('admin.certificate');
        Route::get('create', 'CertificationController@create')->name('admin.certificate.create');
        Route::post('store', 'CertificationController@store')->name('admin.certificate.store');
        Route::get('edit/{id}', 'CertificationController@edit')->name('admin.certificate.edit');
        Route::post('update/{id}', 'CertificationController@update')->name('admin.certificate.update');
        Route::get('delete/{id}', 'CertificationController@destroy')->name('admin.certificate.delete');
        Route::get('change-status/{id}', 'CertificationController@changeStatus')->name('admin.certificate.change.status');
    });

    ############################### End certificate_p Routs #####################################


    ############################### start certificate items Routs #####################################

    Route::group(['prefix' => 'certificate-items'], function () {
        Route::get('/', 'CertificationItemsController@index')->name('admin.certificate.items');
        Route::get('create', 'CertificationItemsController@create')->name('admin.certificate.items.create');
        Route::post('store', 'CertificationItemsController@store')->name('admin.certificate.items.store');
        Route::get('edit/{id}', 'CertificationItemsController@edit')->name('admin.certificate.items.edit');
        Route::post('update/{id}', 'CertificationItemsController@update')->name('admin.certificate.items.update');
        Route::get('delete/{id}', 'CertificationItemsController@destroy')->name('admin.certificate.items.delete');
        Route::get('change-status/{id}', 'CertificationItemsController@changeStatus')->name('admin.certificate.items.change.status');
    });

    ############################### End certificate items Routs #####################################

    ############################### start Warranty Routs #####################################

    Route::group(['prefix' => 'warranty'], function () {
        Route::get('/', 'WarrantyController@index')->name('admin.warranty');
        Route::get('create', 'WarrantyController@create')->name('admin.warranty.create');
        Route::post('store', 'WarrantyController@store')->name('admin.warranty.store');
        Route::get('edit/{id}', 'WarrantyController@edit')->name('admin.warranty.edit');
        Route::post('update/{id}', 'WarrantyController@update')->name('admin.warranty.update');
        Route::get('delete/{id}', 'WarrantyController@destroy')->name('admin.warranty.delete');
        Route::get('change-status/{id}', 'WarrantyController@changeStatus')->name('admin.warranty.change.status');
    });

    ############################### End Warranty Routs #####################################

    ############################### start Gallery Routs #####################################

    Route::group(['prefix' => 'gallery'], function () {
        Route::get('/', 'GalleryController@index')->name('admin.gallery');
        Route::get('create', 'GalleryController@create')->name('admin.gallery.create');
        Route::post('save', 'GalleryController@save')->name('admin.gallery.save');
        Route::post('store', 'GalleryController@store')->name('admin.gallery.store');
        Route::get('delete/{id}', 'GalleryController@destroy')->name('admin.gallery.delete');
        Route::get('change-status/{id}', 'GalleryController@changeStatus')->name('admin.gallery.change.status');
    });

    ############################### End Gallery Routs #####################################


    ############################### start Warranty Routs #####################################

    Route::group(['prefix' => 'catalog'], function () {
        Route::get('/', 'CatalogController@index')->name('admin.catalog');
        Route::get('create', 'CatalogController@create')->name('admin.catalog.create');
        Route::post('store', 'CatalogController@store')->name('admin.catalog.store');
        Route::get('edit/{id}', 'CatalogController@edit')->name('admin.catalog.edit');
        Route::post('update/{id}', 'CatalogController@update')->name('admin.catalog.update');
        Route::get('delete/{id}', 'CatalogController@destroy')->name('admin.catalog.delete');
        Route::get('change-status/{id}', 'CatalogController@changeStatus')->name('admin.catalog.change.status');
    });

    ############################### End Warranty Routs #####################################

    ############################### start messages Routs #####################################

    Route::group(['prefix' => 'messages'], function () {
        Route::get('/', 'AdminMessagesController@index')->name('admin.messages');
        Route::get('show/{id}', 'AdminMessagesController@show')->name('admin.messages.show');
        Route::get('delete/{id}', 'AdminMessagesController@destroy')->name('admin.messages.delete');
    });

    ############################### End messages Routs #####################################
*/


