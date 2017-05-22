<?php
  $this->v->products = $this->model->getProducts();
  $this->v->shops = $this->model->getShops();
  $this->v->prices = $this->model->getPrices();
  $this->v->commissions = $this->model->getCommission();
  $this->v->sitekey = CoreApp\Session::get("sitekey");
