$(document).ready(function() {
    $('.selectpicker').selectpicker();
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            branch_name: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Please supply your first name'
                    }
                }
            },
            company_name: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Please supply your company name !'
                    }
                }
            },
             last_name: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please supply your last name'
                    }
                }
            },
            branch_email: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your email address'
                    },
                    emailAddress: {
                        message: 'Please supply a valid email address'
                    }
                }
            },
           
            branch_phone: {
                validators: {
                    stringLength: {
                            min: 11,
                        },
                        notEmpty: {
                            message: 'Please supply your phone number'
                        },
                        regexp: {
                               regexp: /^\+?([(880)/\.\-\s]*[0-9]){11}\s*((ext|x)\s*[0-9]+)*$/,
                               message: 'The input is not a valid BD phone number'
                        },
                    }
                },

                customer_mail: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply your email address'
                        },
                        emailAddress: {
                            message: 'Please supply a valid email address'
                        }
                    }
                },

                customer_mobile: {
                    validators: {
                        stringLength: {
                                min: 11,
                        },
                        notEmpty: {
                            message: 'Please supply your phone number'
                        },
                        regexp: {
                               regexp: /^\+?([(880)/\.\-\s]*[0-9]){11}\s*((ext|x)\s*[0-9]+)*$/,
                               message: 'The input is not a valid BD phone number'
                        },
                    }
                },
                company_mail: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply your email address'
                        },
                        emailAddress: {
                            message: 'Please supply a valid email address'
                        }
                    }
                },

                company_mobile: {
                    validators: {
                        stringLength: {
                                min: 11,
                        },
                        notEmpty: {
                            message: 'Please supply your phone number'
                        },
                        regexp: {
                               regexp: /^\+?([(880)/\.\-\s]*[0-9]){11}\s*((ext|x)\s*[0-9]+)*$/,
                               message: 'The input is not a valid BD phone number'
                        },
                    }
                },

            phone: {
                validators: {
                    stringLength: {
                            min: 11,
                        },
                        notEmpty: {
                            message: 'Please supply your phone number'
                        },
                        regexp: {
                               regexp: /^\+?([(880)/\.\-\s]*[0-9]){11}\s*((ext|x)\s*[0-9]+)*$/,
                               message: 'The input is not a valid BD phone number'
                        },
                    }
                },
            branch_address: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Please supply your street address'
                    }
                }
            },
            branch_city: {
                validators: {
                     stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Please supply your city'
                    }
                }
            },
            branch: {
                validators: {
                    notEmpty: {
                        message: 'Please select your Branch'
                    }
                }
            },
            company_ps_id: {
                validators: {
                    notEmpty: {
                        message: 'Please select your Company'
                    }
                }
            },

            product_type: {
                validators: {
                    notEmpty: {
                        message: 'Please select your product type'
                    }
                }
            },
             branch_city_id: {
                validators: {
                    notEmpty: {
                        message: 'Please select your Branch'
                    }
                }
            },
            
            name: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please supply your Employee Name'
                    }
                }
            },
            } //fields
        });
       
});
