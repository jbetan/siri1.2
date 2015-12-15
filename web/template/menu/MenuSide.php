<?php
/**
 * User: Renan
 * Date: 14/04/2015
 * Time: 03:54 PM
 */
?><ul id="main-menu" class="gui-controls">

    <!-- BEGIN MAIN MENU OPTION -->
    <li ng-class="menu.sons.length > 0 ? 'gui-folder' : ''" ng-repeat="menu in menuCtrl.menu.data">
        <a ng-href="{{menu.lnk}}">
            <div class="gui-icon"><i ng-class="menu.icon"></i></div>
            <span class="title">{{menu.nombre}}</span>
        </a>
        <!--start submenu -->
        <ul ng-if="menu.sons.length > 0">
            <li ng-class="menuSub.sons.length > 0 ? 'gui-folder' : ''" ng-repeat="menuSub in menu.sons">
                <a ng-href="{{menuSub.lnk}}" ><span class="title">{{menuSub.nombre}}</span></a>
                <!--start submenu -->
                <ul ng-if="menuSub.sons.length > 0">
                    <li ng-class="menuSubSub.sons.length > 0 ? 'gui-folder' : ''" ng-repeat="menuSubSub in menuSub.sons">
                        <a ng-href="{{menuSubSub.lnk}}" ><span class="title">{{menuSubSub.nombre}}</span></a>

                    </li>

                </ul><!--end /submenu -->
            </li>


        </ul><!--end /submenu -->
    </li><!--end /menu-li -->
    <!-- END MAIN MENU OPTION -->


</ul><!--end .main-menu -->