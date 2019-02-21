import React, { Component } from 'react';
import DatePicker from 'react-datepicker';
import ptBr from 'date-fns/locale/pt';
import Select from 'react-select';
import axios from 'axios';

import "react-datepicker/dist/react-datepicker.css";
import './schedule.scss';

const R = require('ramda');

const hour = [
    { value: 'manhã', label: 'Manhã' },
    { value: 'tarde', label: 'Tarde' }
];

let departure = [
    { value: 'rio de janeiro', label: 'Rio de Janeiro'},
    { value: 'buzios', label: 'Búzios' },
    { value: 'ilha grande', label: 'Ilha Grande' },
    { value: 'angra dos reis', label: 'Angra dos Reis' },
]

let destination = [
    { value: 'rio de janeiro', label: 'Rio de Janeiro' },
    { value: 'buzios', label: 'Búzios' },
    { value: 'ilha grande', label: 'Ilha Grande' },
    { value: 'angra dos reis', label: 'Angra dos Reis' },
]

export default class Schedule extends Component {
    

    state = {
        startDate: null,
        selectedOption: null,
        disableOption: null,
        package: '',
        transfer: {},
        selectedDeparture: null,
        selectedDestination: null,
        selectDestination: true

    }

    async componentDidMount() {
        const endpoint = window.location.pathname;
        const transfer = await axios.get(`/api${endpoint}`);
        console.log(transfer.data.data);
        const date = new Date();
        this.setState({startDate: date.now, transfer: transfer.data.data})
        console.log(this.state);
    }


    handleChange = (e) => {
        
        console.log(`Option selected:`, e);
    }

    handleChangeSelectDeparture = (selectedDeparture) => {
        const destinationIndex = R.findIndex(R.propEq('label', selectedDeparture.label))(destination)
        console.log(destination[destinationIndex]);
        
        this.setState({
            selectedDeparture,
            selectDestination: false,
            disableOption: selectedDeparture.label
        });
        console.log(`Option selected:`, selectedDeparture, this.state.disableOption);
    }

    handleChangeSelectDestination = (selectedDestination) => {
        
        this.setState({
            selectedDestination
        });
        console.log(`Option selected:`, selectedDestination);
    }

    handleChangeSelect = (selected) => {

       
        console.log(`Option selected:`, selected);
    }

    render() {
        const {
            disableOption,
            selectDestination,
            selectedDeparture,
            selectedDestination
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
                                value={selectedDeparture}
                                onChange={this.handleChangeSelectDeparture}
                                options={departure}
                                
                            />
                        </div>
                        <div className="schedule__field">
                            <label className="schedule__label">
                                Para
                            </label>
                            <Select
                                className="schedule__select"
                                placeholder="Selecione o destino"
                                value={selectedDestination}
                                onChange={this.handleChangeSelectDestination}
                                options={departure}
                                isDisabled={selectDestination}
                                isOptionDisabled={(option) => option.label === disableOption }
                            />
                        </div>
                        <div className="schedule__choiche">
                            <div className="schedule__radio">
                                <input type="radio" id="ida-e-volta" name="package" onChange={this.handleChange}/>
                                <label className="schedule__label" for="ida-e-volta">
                                    <span className="schedule__label-bullet"></span>
                                    ida e volta
                                </label>
                                
                            </div>
                            <div className="schedule__radio">
                                <input type="radio" id="ida-ou-volta" onChange={this.handleChange} name="package"/>
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
                                selected={this.state.startDate}
                                onChange={this.handleChange}
                            />
                        </div>
                        <div className="schedule__field">
                            <label className="schedule__label">
                                <i className="fi fi-calendar"></i> Volta
                            </label>
                            <DatePicker
                                selected={this.state.startDate}
                                onChange={this.handleChange}
                            />
                        </div>
                        <div className="schedule__field">
                            <label className="schedule__label">
                                <i className="fi fi-clock"></i> Hora
                            </label>
                            <Select
                                className="schedule__select"
                                placeholder="Selecione o horário"
                                value={selectedDestination}
                                onChange={this.handleChangeSelect}
                                options={hour}
                            />
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
