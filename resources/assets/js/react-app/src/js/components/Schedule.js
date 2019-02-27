import React, { Component } from 'react';
import DatePicker from 'react-datepicker';
import ptBr from 'date-fns/locale/pt';
import Select from 'react-select';
import axios from 'axios';

import "react-datepicker/dist/react-datepicker.css";
import './schedule.scss';

const R = require('ramda');

const hourOptions = [
    { value: 'manhã', label: 'Manhã' },
    { value: 'tarde', label: 'Tarde' }
];

let departureOptions = [
    { value: 'rio de janeiro', label: 'Rio de Janeiro'},
    { value: 'buzios', label: 'Búzios' },
    { value: 'ilha grande', label: 'Ilha Grande' },
    { value: 'angra dos reis', label: 'Angra dos Reis' },
]

let destinationOptions = [
    { value: 'rio de janeiro', label: 'Rio de Janeiro' },
    { value: 'buzios', label: 'Búzios' },
    { value: 'ilha grande', label: 'Ilha Grande' },
    { value: 'angra dos reis', label: 'Angra dos Reis' },
]

export default class Schedule extends Component {
    

    state = {
        selected: 'ida e volta',
        startDate: null,
        backDate: null,
        selectedOption: null,
        disableOption: null,
        transfer: {},
        selectedDeparture: null,
        selectedDestination: null,
        selectDestination: true,
        name: '',
        email: '',
        phone: '',
        package: '',
        date: '',
        date_back: '',
        hour: '',
        quantity: '',
        departure: null,
        destination: '',
        city_country: '',
        price_combo: 0,
        price_total: 0,
        onBuy: false



    }

    async componentDidMount() {
        const endpoint = window.location.pathname;
        const transfer = await axios.get(`/api/transfers`);
        console.log(transfer.data.data);
        const date = new Date();
        this.setState({startDate: date.now, transfer: transfer.data.data})
        console.log(this.state);
    }


    handleChange = (e) => {
        const name = e.target.getAttribute('name');
        if(name === 'quantity'){
            const value = parseInt(e.target.value) || 0;
            console.log(value * this.state.price_combo);
            this.setState({
                [name]: value,
                price_total: this.state.price_combo * value
            })
        } else {
            this.setState({
                [name]: e.target.value
            })
        }
        

    }

    handleChangeDate = (e) => {

        console.log(`Option selected:`, e);
        this.setState({ date: e})
    }

    handleChangeBackDate = (e) => {

        console.log(`Option selected:`, e);
        this.setState({ date_back: e })
    }

    handleChangeSelectDeparture = (selectedDeparture) => {
        const destinationIndex = R.findIndex(R.propEq('label', selectedDeparture.label))(destinationOptions)
        console.log(destinationOptions[destinationIndex]);
        
        this.setState({
            departure: selectedDeparture,
            selectDestination: false,
            disableOption: selectedDeparture.label
        });
        console.log(`Option selected:`, selectedDeparture, this.state.disableOption);
    }

    handleChangeSelectDestination = (selectedDestination) => {
        const tranferIndex = R.findIndex(R.propEq('name', `${this.state.departure.label} x ${selectedDestination.label}`))(this.state.transfer)

        if (R.isNil(this.state.transfer[tranferIndex])){
            this.setState({
                destination: selectedDestination
            });
        } else {

            if(this.state.selected === 'ida ou volta'){
                this.setState({
                    destination: selectedDestination,
                    price_combo: this.state.transfer[tranferIndex].price
                });
            } else {
                this.setState({
                    destination: selectedDestination,
                    price_combo: this.state.transfer[tranferIndex].price_combo
                });
            }

            
        }

        
        console.log(`Option selected:`, this.state.transfer[tranferIndex]);
    }

    handleChangeSelect = (selected) => {

       
        console.log(`Option selected:`, selected);
    }

    handleChangeSelectHour = (selected) => {
        this.setState({
            hour: selected
        });

        console.log(`Option selected:`, selected);
    }

    

    render() {
        const {
            disableOption,
            selectDestination,
            departure,
            destination,
            hour,
            date,
            date_back,
            quantity,
            price_combo,
            price_total,
            name,
            email,
            phone,
            onBuy
        } = this.state;
        
        return (
            <div className="schedule">
                <div className="schedule__box">
                    <div className="schedule__header">
                        <div className="schedule__title">
                            <i className="fi fi-bus"></i>
                            <span>Agendar Transfer</span>
                        </div>
                        <div className="schedule__field">
                            <label className="schedule__label">
                                Translado de
                            </label>
                            <Select
                                className="schedule__select"
                                placeholder="Selecione a origem"
                                value={departure}
                                onChange={this.handleChangeSelectDeparture}
                                options={departureOptions}
                                
                            />
                        </div>
                        <div className="schedule__field">
                            <label className="schedule__label">
                                Para
                            </label>
                            <Select
                                className="schedule__select"
                                placeholder="Selecione o destino"
                                value={destination}
                                onChange={this.handleChangeSelectDestination}
                                options={departureOptions}
                                isDisabled={selectDestination}
                                isOptionDisabled={(option) => option.label === disableOption }
                            />
                        </div>
                        <div className="schedule__choiche">
                            <div className="schedule__radio">
                                <input type="radio" id="ida-e-volta" name="package" value="ida e volta" checked={this.state.selected === 'ida e volta'} onChange={(e) => this.setState({ selected: e.target.value })}/>
                                <label className="schedule__label" for="ida-e-volta">
                                    <span className="schedule__label-bullet"></span>
                                    ida e volta
                                </label>
                                
                            </div>
                            <div className="schedule__radio">
                                <input type="radio" id="ida-ou-volta" name="package" value="ida ou volta" checked={this.state.selected === 'ida ou volta'} onChange={(e) => this.setState({ selected: e.target.value })}/>
                                <label className="schedule__label" for="ida-ou-volta" >
                                    <span className="schedule__label-bullet"></span>
                                ida ou volta
                                </label>
                            </div>
                        </div>
                        
                    </div>
                    <div className="schedule__date">
                        <div className="schedule__field">
                            <label className="schedule__label">
                                <i className="fi fi-calendar"></i> Ida
                            </label>
                            <DatePicker
                                placeholderText="Escolha a data de ida"
                                minDate={new Date()}
                                selected={date}
                                onChange={this.handleChangeDate}
                                dateFormat="dd/MM/yyyy"
                            />
                        </div>
                        <div className="schedule__field">
                            <label className="schedule__label">
                                <i className="fi fi-calendar"></i> Volta
                            </label>
                            <DatePicker
                                placeholderText="Escolha a data de volta"
                                minDate={date}
                                selected={date_back}
                                onChange={this.handleChangeBackDate}
                                dateFormat="dd/MM/yyyy"
                            />
                        </div>
                        <div className="schedule__field">
                            <label className="schedule__label">
                                <i className="fi fi-clock"></i> Hora
                            </label>
                            <Select
                                className="schedule__select"
                                placeholder="Selecione o horário"
                                value={hour}
                                onChange={this.handleChangeSelectHour}
                                options={hourOptions}
                            />
                        </div>
                        
                    </div>
                    <div className="schedule__price">
                        <div className="schedule__field">
                            <label className="schedule__label">
                                <i className="fi fi-persons"></i> Quantidade
                            </label>
                            <input type="text" className="schedule__input" value={quantity} name="quantity" onChange={this.handleChange}/>
                        </div>
                        <div className="schedule__box">
                            <label className="schedule__label">
                                Total
                            </label>
                            <span className="schedule__price-combo">R$ {price_combo}</span>
                        </div>
                        <div className="schedule__box">
                            <label className="schedule__label">
                                Total
                            </label>
                            <span className="schedule__price-total">R$ {price_total}</span>
                        </div>
                        <div className="schedule__box">
                            <button className="btn btn--buy" onClick={(e) => this.setState({ onBuy: true })}>Comprar</button>
                        </div>
                    </div>
                    <div className={onBuy ? `schedule__payment is-active` : `schedule__payment`}>
                        <div className="schedule__profile">
                            <div className="schedule__field">
                                <label className="schedule__label">
                                    <i className="fi fi-person"></i> Nome
                                </label>
                                <input type="text" className="schedule__input" value={name} name="name" onChange={this.handleChange} />
                            </div>
                            <div className="schedule__field">
                                <label className="schedule__label">
                                    <i className="fi fi-email"></i> Email
                                </label>
                                <input type="text" className="schedule__input" value={email} name="email" onChange={this.handleChange} />
                            </div>
                            <div className="schedule__field">
                                <label className="schedule__label">
                                    <i className="fi fi-phone"></i> Telefone
                                </label>
                                <input type="text" className="schedule__input" value={phone} name="phone" onChange={this.handleChange} />
                            </div>
                        </div>
                        <div className="schedule__payment-type">
                            
                            <div className="schedule__choiche">
                                <div className="schedule__radio">
                                    <input type="radio" id="paypal" name="payment" value="paypal" checked={this.state.payment === 'paypal'} onChange={(e) => this.setState({ payment: e.target.value })} />
                                    <label className="schedule__label" for="paypal">
                                        <span className="schedule__label-bullet"></span>
                                        <i className="fi fi-paypal"></i>
                                    </label>

                                </div>
                                <div className="schedule__radio">
                                    <input type="radio" id="boleto" name="payment" value="boleto" checked={this.state.payment === 'boleto'} onChange={(e) => this.setState({ payment: e.target.value })} />
                                    <label className="schedule__label" for="boleto" >
                                        <span className="schedule__label-bullet"></span>
                                        <i className="fi fi-shopping-barcode"></i>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
