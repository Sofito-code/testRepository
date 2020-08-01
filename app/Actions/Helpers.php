<?php

function setActive($routeName): string
{
    return request()->routeIs($routeName) ? 'active' : '';
}
