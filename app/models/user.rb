class User
  include Mongoid::Document
  belongs_to :student_or_instructor, :polymorphic => true

  field :username
  field :email
  field :password
  field :encrypted_password
  

attr_accessor :password
  email_regex =/[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{1,9}/i
  validates :username, :presence => true, :uniqueness => true, :case_sensitive => false, :length => { :in => 3..20 }
  validates :email, :presence => true, :uniqueness => true, :case_sensitive => false, :format => email_regex
  validates :password, :confirmation => true
  validates_length_of :password, :in => 6..20, :on => :create
end
