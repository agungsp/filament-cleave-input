import {
    formatCreditCard,
    formatNumeral,
    formatDate,
    formatTime,
    formatGeneral,
    unformatCreditCard,
    unformatNumeral,
    unformatGeneral,
    registerCursorTracker
} from 'cleave-zen';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('cleaveInputComponent', ({ state, cleaveType, options }) => ({
        state,
        cleaveType,
        options,
        destroyTracker: null,

        init() {
            if (this.cleaveType === 'general' && this.options.delimiter === undefined && !this.options.delimiters) {
                this.options.delimiter = ' ';
            }

            this.updateVisibleInput(this.state);

            let delimiterConfig = {};
            if (this.options.delimiters) {
                delimiterConfig.delimiters = this.options.delimiters;
            } else if (this.options.delimiter !== undefined) {
                delimiterConfig.delimiter = this.options.delimiter;
            } else {
                if (this.cleaveType === 'creditCard') delimiterConfig.delimiter = ' ';
                else if (this.cleaveType === 'date') delimiterConfig.delimiter = '/';
                else if (this.cleaveType === 'time') delimiterConfig.delimiter = ':';
                else if (this.cleaveType === 'numeral') delimiterConfig.delimiter = this.options.numeralThousandsGroupStyle === 'none' ? '' : (this.options.delimiter || ',');
                else delimiterConfig.delimiter = ' ';
            }

            this.destroyTracker = registerCursorTracker({
                input: this.$refs.cleaveInput,
                ...delimiterConfig,
                prefix: this.options.prefix,
            });

            this.$watch('state', (value) => {
                if (value !== this.getUnformattedValue(this.$refs.cleaveInput.value)) {
                    this.updateVisibleInput(value);
                }
            });
        },

        updateVisibleInput(val) {
            let formatted = val;
            if (val !== null && val !== undefined) {
                formatted = this.formatValue(String(val));
            }
            if (this.$refs.cleaveInput) {
                this.$refs.cleaveInput.value = formatted || '';
            }
        },

        formatValue(value) {
            switch (this.cleaveType) {
                case 'creditCard':
                    return formatCreditCard(value);
                case 'numeral':
                    return formatNumeral(value, this.options);
                case 'date':
                    return formatDate(value, this.options);
                case 'time':
                    return formatTime(value, this.options);
                case 'general':
                default:
                    return formatGeneral(value, this.options);
            }
        },

        getUnformattedValue(value) {
            switch (this.cleaveType) {
                case 'creditCard':
                    return unformatCreditCard(value);
                case 'numeral':
                    return unformatNumeral(value, {
                        numeralDecimalMark: this.options.numeralDecimalMark || '.',
                    });
                case 'date':
                case 'time':
                case 'general':
                default:
                    if (this.options.blocks) {
                        return unformatGeneral(value, {
                            delimiter: this.options.delimiter,
                            delimiters: this.options.delimiters,
                        });
                    }
                    return value;
            }
        },

        handleInput(e) {
            const el = this.$refs.cleaveInput;
            const value = el.value;

            const formattedValue = this.formatValue(value);
            el.value = formattedValue;
            
            let unformatted = this.getUnformattedValue(formattedValue);
            this.state = unformatted;
        },

        destroy() {
            if (this.destroyTracker) {
                this.destroyTracker();
            }
        }
    }));
});
