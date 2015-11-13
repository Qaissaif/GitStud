class Student
  include Mongoid::Document
      has_one :user, :as => :student_or_instructor, :dependent => :destroy
      has_and_belongs_to_many :repositories
      has_and_belongs_to_many :instructors
      

end
