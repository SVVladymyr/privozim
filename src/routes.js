import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Contact from './components/Contact';
import Catalog from './components/Catalog';
import Track from './components/Track';
import Manager from './components/Manager';
import About from './components/About';
import Order from './components/Order';
import Main from './components/Main';
import Orders from './components/Orders';
import Agreement from './components/Agreement';
import Description from './components/Description';
import Prohibited from './components/Prohibited';
import Vacancies from './components/Vacancies';
import Money from './components/Money';
import Offer from './components/Offer';

import {store} from './store';

const routes = [
  {
    path: '/main',
    name: 'main',
    component: Main,
    props: true
  },
  {
    path: '/',
    name: '/',
    component: Main,
    props: true
  },
  {
    path: '/contact',
    name: 'contact',
    component: Contact,
    props: true
  },
  {
    path: '/track',
    name: 'track',
    component: Track,
    props: true
  },
  {
    path: '/manager',
    name: 'manager',
    component: Manager,
    props: true
  },
  {
    path: '/about',
    name: 'about',
    component: About,
    props: true,
    children: [{
      path: '',
      component: Description
    }, {
      path: 'money',
      component: Money
    }, {
      path: 'description',
      name: 'about/description',
      component: Description
    }, {
      path: 'agreement',
      component: Agreement
    }, {
      path: 'orders',
      name: 'about/orders',
      component: Orders
    }, {
      path: 'prohibited',
      component: Prohibited
    }, {
      path: 'vacancies',
      component: Vacancies
    }, {
      path: 'offer',
      name: 'about/offer',
      component: Offer
    }, {
      path: '*',
      component: Description
    }]
  },
  {
    path: '/order',
    name: 'order',
    component: Order,
    props: true
  },
  {
    path: '/catalog',
    name: 'catalog',
    component: Catalog,
    props: true
  },
  {
    path: '*',
    redirect: {name: '/'}
  }
];

export const router = new VueRouter({
	routes,
	mode: 'history'
});
